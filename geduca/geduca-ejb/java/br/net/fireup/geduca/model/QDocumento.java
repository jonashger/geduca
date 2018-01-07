package br.net.fireup.geduca.model;

import static com.mysema.query.types.PathMetadataFactory.*;

import com.mysema.query.types.path.*;

import com.mysema.query.types.PathMetadata;
import javax.annotation.Generated;
import com.mysema.query.types.Path;


/**
 * QDocumento is a Querydsl query type for Documento
 */
@Generated("com.mysema.query.codegen.EntitySerializer")
public class QDocumento extends EntityPathBase<Documento> {

    private static final long serialVersionUID = -1523400388L;

    public static final QDocumento documento = new QDocumento("documento");

    public final NumberPath<Long> codigoPessoa = createNumber("codigoPessoa", Long.class);

    public final NumberPath<Long> cpf = createNumber("cpf", Long.class);

    public final DateTimePath<java.util.Date> dataAlteracao = createDateTime("dataAlteracao", java.util.Date.class);

    public final DateTimePath<java.util.Date> dataCriacao = createDateTime("dataCriacao", java.util.Date.class);

    public final NumberPath<Long> id = createNumber("id", Long.class);

    public final StringPath rg = createString("rg");

    public QDocumento(String variable) {
        super(Documento.class, forVariable(variable));
    }

    public QDocumento(Path<? extends Documento> path) {
        super(path.getType(), path.getMetadata());
    }

    public QDocumento(PathMetadata<?> metadata) {
        super(Documento.class, metadata);
    }

}

