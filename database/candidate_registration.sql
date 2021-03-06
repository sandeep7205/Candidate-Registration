PGDMP          &                y            candidate_registration    10.17    13.3                0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false                       0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false                       0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false                       1262    16473    candidate_registration    DATABASE     r   CREATE DATABASE candidate_registration WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE = 'English_India.1252';
 &   DROP DATABASE candidate_registration;
                postgres    false                        3079    16474 	   adminpack 	   EXTENSION     A   CREATE EXTENSION IF NOT EXISTS adminpack WITH SCHEMA pg_catalog;
    DROP EXTENSION adminpack;
                   false                       0    0    EXTENSION adminpack    COMMENT     M   COMMENT ON EXTENSION adminpack IS 'administrative functions for PostgreSQL';
                        false    1            ?            1259    16483    candidate_registration    TABLE     ?  CREATE TABLE public.candidate_registration (
    first_name character varying(30) NOT NULL,
    mid_name character varying(30) NOT NULL,
    last_name character varying(30) NOT NULL,
    dob character varying(11),
    gender character varying(11),
    h_qualification character varying(11),
    specialisation character varying(11),
    college_name character varying(255) NOT NULL,
    course_enroll character varying(30),
    image_file character varying(255),
    descriptions character varying(255),
    declaration character varying(100),
    reg_id integer NOT NULL
);
 *   DROP TABLE public.candidate_registration;
       public            postgres    false            ?            1259    16489 !   candidate_registration_reg_id_seq    SEQUENCE     ?   CREATE SEQUENCE public.candidate_registration_reg_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 8   DROP SEQUENCE public.candidate_registration_reg_id_seq;
       public          postgres    false    197                       0    0 !   candidate_registration_reg_id_seq    SEQUENCE OWNED BY     g   ALTER SEQUENCE public.candidate_registration_reg_id_seq OWNED BY public.candidate_registration.reg_id;
          public          postgres    false    198            ?            1259    16491    course_enroll    TABLE     u   CREATE TABLE public.course_enroll (
    course_id character varying(2) NOT NULL,
    course character varying(11)
);
 !   DROP TABLE public.course_enroll;
       public            postgres    false            ?            1259    16494    high_qualification    TABLE     |   CREATE TABLE public.high_qualification (
    q_id character varying(2) NOT NULL,
    qualification character varying(11)
);
 &   DROP TABLE public.high_qualification;
       public            postgres    false            ?            1259    16497    specialisation    TABLE     ?   CREATE TABLE public.specialisation (
    s_id character varying(2) NOT NULL,
    h_q_id character varying(2),
    branch character varying(11)
);
 "   DROP TABLE public.specialisation;
       public            postgres    false            |
           2604    16500    candidate_registration reg_id    DEFAULT     ?   ALTER TABLE ONLY public.candidate_registration ALTER COLUMN reg_id SET DEFAULT nextval('public.candidate_registration_reg_id_seq'::regclass);
 L   ALTER TABLE public.candidate_registration ALTER COLUMN reg_id DROP DEFAULT;
       public          postgres    false    198    197                      0    16483    candidate_registration 
   TABLE DATA           ?   COPY public.candidate_registration (first_name, mid_name, last_name, dob, gender, h_qualification, specialisation, college_name, course_enroll, image_file, descriptions, declaration, reg_id) FROM stdin;
    public          postgres    false    197   ?$                 0    16491    course_enroll 
   TABLE DATA           :   COPY public.course_enroll (course_id, course) FROM stdin;
    public          postgres    false    199   C%       	          0    16494    high_qualification 
   TABLE DATA           A   COPY public.high_qualification (q_id, qualification) FROM stdin;
    public          postgres    false    200   ?%       
          0    16497    specialisation 
   TABLE DATA           >   COPY public.specialisation (s_id, h_q_id, branch) FROM stdin;
    public          postgres    false    201   ?%                  0    0 !   candidate_registration_reg_id_seq    SEQUENCE SET     P   SELECT pg_catalog.setval('public.candidate_registration_reg_id_seq', 29, true);
          public          postgres    false    198            ?
           2606    16502    course_enroll course_id 
   CONSTRAINT     \   ALTER TABLE ONLY public.course_enroll
    ADD CONSTRAINT course_id PRIMARY KEY (course_id);
 A   ALTER TABLE ONLY public.course_enroll DROP CONSTRAINT course_id;
       public            postgres    false    199            ?
           2606    16504    high_qualification q_id 
   CONSTRAINT     W   ALTER TABLE ONLY public.high_qualification
    ADD CONSTRAINT q_id PRIMARY KEY (q_id);
 A   ALTER TABLE ONLY public.high_qualification DROP CONSTRAINT q_id;
       public            postgres    false    200            ?
           2606    16506    candidate_registration reg_id 
   CONSTRAINT     _   ALTER TABLE ONLY public.candidate_registration
    ADD CONSTRAINT reg_id PRIMARY KEY (reg_id);
 G   ALTER TABLE ONLY public.candidate_registration DROP CONSTRAINT reg_id;
       public            postgres    false    197            ?
           2606    16508 "   specialisation specialisation_pkey 
   CONSTRAINT     b   ALTER TABLE ONLY public.specialisation
    ADD CONSTRAINT specialisation_pkey PRIMARY KEY (s_id);
 L   ALTER TABLE ONLY public.specialisation DROP CONSTRAINT specialisation_pkey;
       public            postgres    false    201            }
           1259    16509    fki_c_id_to_c_enroll    INDEX     `   CREATE INDEX fki_c_id_to_c_enroll ON public.candidate_registration USING btree (course_enroll);
 (   DROP INDEX public.fki_c_id_to_c_enroll;
       public            postgres    false    197            ?
           1259    16510    fki_q_id to h_q_id    INDEX     Q   CREATE INDEX "fki_q_id to h_q_id" ON public.specialisation USING btree (h_q_id);
 (   DROP INDEX public."fki_q_id to h_q_id";
       public            postgres    false    201            ~
           1259    16511    fki_q_id_to_h_qualification    INDEX     i   CREATE INDEX fki_q_id_to_h_qualification ON public.candidate_registration USING btree (h_qualification);
 /   DROP INDEX public.fki_q_id_to_h_qualification;
       public            postgres    false    197            
           1259    16512    fki_s_id_to_specialisation    INDEX     g   CREATE INDEX fki_s_id_to_specialisation ON public.candidate_registration USING btree (specialisation);
 .   DROP INDEX public.fki_s_id_to_specialisation;
       public            postgres    false    197            ?
           2606    16513 '   candidate_registration c_id_to_c_enroll    FK CONSTRAINT     ?   ALTER TABLE ONLY public.candidate_registration
    ADD CONSTRAINT c_id_to_c_enroll FOREIGN KEY (course_enroll) REFERENCES public.course_enroll(course_id);
 Q   ALTER TABLE ONLY public.candidate_registration DROP CONSTRAINT c_id_to_c_enroll;
       public          postgres    false    199    2691    197            ?
           2606    16518    specialisation q_id_to_h_q_id    FK CONSTRAINT     ?   ALTER TABLE ONLY public.specialisation
    ADD CONSTRAINT q_id_to_h_q_id FOREIGN KEY (h_q_id) REFERENCES public.high_qualification(q_id);
 G   ALTER TABLE ONLY public.specialisation DROP CONSTRAINT q_id_to_h_q_id;
       public          postgres    false    201    2693    200            ?
           2606    16523 .   candidate_registration q_id_to_h_qualification    FK CONSTRAINT     ?   ALTER TABLE ONLY public.candidate_registration
    ADD CONSTRAINT q_id_to_h_qualification FOREIGN KEY (h_qualification) REFERENCES public.high_qualification(q_id);
 X   ALTER TABLE ONLY public.candidate_registration DROP CONSTRAINT q_id_to_h_qualification;
       public          postgres    false    2693    197    200            ?
           2606    16528 -   candidate_registration s_id_to_specialisation    FK CONSTRAINT     ?   ALTER TABLE ONLY public.candidate_registration
    ADD CONSTRAINT s_id_to_specialisation FOREIGN KEY (specialisation) REFERENCES public.specialisation(s_id);
 W   ALTER TABLE ONLY public.candidate_registration DROP CONSTRAINT s_id_to_specialisation;
       public          postgres    false    197    2696    201               ?   x?E?K? ??e?@|Ԛ???q?;yQ"??H?ߏi:=??8p?R<??.ٝA$U'Ik???????r?lk?QN?d???M`???:q8??4Z6?ӴGC8??^?oa???xr?U??]?wZ<j!??.?         -   x?3?t?2?t???2??rs?2??????2???????? ~??      	   $   x?3?t?qu??2???0?9]<|?}?b???? u??      
   D   x?3?4?tv?2Ҟ!\?@?Օ?H??r?ry?\f@(i?@j-?4P֒??54 2??b???? 	??     